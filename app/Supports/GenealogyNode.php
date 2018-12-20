<?php
/**
 * Author: R.j
 * Date: 2018-12-19 15:27
 * File: GenealogyNode.php
 */

namespace App\Supports {

    use App\Cache\RankCache;
    use App\Repositories\Rank;
    use App\Repositories\Rep;

    /**
     * @property mixed id
     * @property mixed pid
     * @property mixed number
     * @property mixed name
     * @property mixed rank
     * @property mixed img
     * @property mixed tags
     * @property mixed left
     * @property mixed right
     * @property mixed member
     * @property mixed cancelled
     */
    class Node {

    }

    class GenealogyNode {

        /** @var int $depth */
        private $depth = 3;
        /** @var Rank[] $ranks */
        private $ranks;
        /** @var Node[] $nodes */
        private $nodes = [];

        /**
         * GenealogyNode constructor.
         */
        public function __construct() {
            $this->ranks = Converter::convert(RankCache::getRanks(), Rank::class);
        }

        /**
         * @return GenealogyNode
         */
        public static function make() {
            return new GenealogyNode;
        }

        /**
         * @param array $reps
         * @return Node[]
         */
        public function binary($reps) {
            /** @var Node[] $data */
            $data = [];
            if ($reps) {
                foreach ($reps as $v) {
                    /** @var Rep $rep */
                    $rep                = Converter::convert($v, Rep::class);
                    $data[$rep->number] = $this->node($rep);
                }
            }
            foreach ($data as $number => $node) {
                if ($node->left) {
                    if (!isset($data[$node->left])) {
                        $node->tags = ['more'];
                    }
                }
                if ($node->right) {
                    if (!isset($data[$node->right])) {
                        $node->tags = ['more'];
                    }
                }
                if ($node->cancelled) {
                    $node->tags[] = 'cancelled';
                } else if ($node->member) {
                    $node->tags[] = 'member';
                }
                $this->nodes[$node->id] = $node;
                if ($node->left && isset($data[$node->left])) {
                    $this->nodes[$node->left] = $data[$node->left];
                }
                // empty
                if (!$node->left && $node->right && isset($data[$node->right])) {
                    $this->nodes[$node->id . '-' . $this->getPos(1)] = $this->empty($node->id, 1);
                }
                if ($node->right && isset($data[$node->right])) {
                    $this->nodes[$node->right] = $data[$node->right];
                }
                if (!$node->right && $node->left && isset($data[$node->left])) {
                    $this->nodes[$node->id . '-' . $this->getPos(2)] = $this->empty($node->id, 2);
                }
                if (!$node->left && !$node->right) {
                    $this->nodes[$node->id . '-' . $this->getPos(1)] = $this->empty($node->id, 1);
                    $this->nodes[$node->id . '-' . $this->getPos(2)] = $this->empty($node->id, 2);
                }
            }
            return $this->nodes;
        }

        /**
         * @param string $repNumber
         * @param int    $pos
         * @return Node
         */
        private function empty(string $repNumber, $pos) {
            $node         = new Node();
            $node->id     = $repNumber . '-' . $this->getPos($pos);
            $node->pid    = $repNumber;
            $node->number = '';
            $node->name   = 'Available';
            $node->rank   = $this->posName($pos);
            $node->img    = '';
            $node->tags   = ['add'];
            return $node;
        }

        /**
         * @param Rep $rep
         * @return Node
         */
        private function node(Rep $rep) {
            $node     = new Node();
            $node->id = $rep->number;
            if ($rep->binary_upline_number) {
                $node->pid = $rep->binary_upline_number;
            }
            $node->number    = $rep->number . '-' . $this->getPos($rep->binary_position);
            $node->name      = cutstr("{$rep->first_name} {$rep->last_name}", 16);
            $node->cancelled = $rep->cancelled;
            $node->member    = $rep->member;
            if ($rep->cancelled) {
                $node->rank = 'Cancelled';
            } else {
                if ($rep->member) {
                    $node->rank = 'Member';
                } else {
                    $node->rank = $this->getRank($rep->lifetime_rank_id);
                }
            }
            if ($rep->photo) {
                $node->img = $rep->photo;
            } else {
                $node->img = $rep->gender == 1 ? '/img/female.png' : '/img/male.png';
            }
            $node->left  = $rep->binary_left_number;
            $node->right = $rep->binary_right_number;
            return $node;
        }

        private function getRank($id) {
            foreach ($this->ranks as $rank) {
                if ($rank->id == $id) {
                    return $rank->name;
                }
            }
            return $id;
        }

        /**
         * @param $pos
         * @return string
         */
        private function getPos($pos) {
            switch ($pos) {
                case 1:
                    return 'L';
                case 2:
                    return 'R';
                default:
                    return 'C';
            }
        }

        /**
         * @param $pos
         * @return string
         */
        private function posName($pos) {
            switch ($pos) {
                case 1:
                    return 'Left';
                default:
                    return 'Right';
            }
        }

    }
}


