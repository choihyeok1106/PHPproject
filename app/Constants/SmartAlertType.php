<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-12
 * Time: 17:50
 */

namespace App\Constants;


/**
 * @property mixed type
 * @property mixed icon
 * @property mixed myAlert
 * @property mixed teamAlert
 * @property mixed title
 * @property mixed description
 */
class SmartAlertType {

    const AutoshipNotProcessed        = 'AutoshipNotProcessed';
    const AutoshipLowPV               = 'AutoshipLowPV';
    const AutoshipNotConfigured       = 'AutoshipNotConfigured';
    const NewIBO                      = 'NewIBO';
    const RenewalExpiring             = 'RenewalExpiring';
    const RenewalExpired              = 'RenewalExpired';
    const AutoshipNotConfiguredNewIBO = 'AutoshipNotConfiguredNewIBO';
    const PotentialNewBronzeIBO       = 'PotentialNewBronzeIBO';
    const AutoshipCCExpiring          = 'AutoshipCCExpiring';
    const AutoshipCCExpired           = 'AutoshipCCExpired';
    const NewBronzeIBO                = 'NewBronzeIBO';
    const NewBronzeIBO2               = 'NewBronzeIBO2';
    const AutoshipDiscontinuedProduct = 'AutoshipDiscontinuedProduct';

    /**
     * @return SmartAlertType[]
     */
    public static function types() {
        $types = [];

        $type              = new SmartAlertType();
        $type->type        = self::AutoshipNotProcessed;
        $type->icon        = '';
        $type->myAlert     = 'Your autoship failed to process on {DateNextRun:MMMM d}.';
        $type->teamAlert   = 'Autoship failed to process on {DateNextRun:MMMM d}.';
        $type->title       = 'Autoships Not Processed';
        $type->description = 'Autoship orders that failed to process on their scheduled date.';
        $types[]           = $type;

        $type              = new SmartAlertType();
        $type->type        = self::AutoshipLowPV;
        $type->icon        = '';
        $type->myAlert     = 'Your autoship volume is below the recommended 100 PV level.';
        $type->teamAlert   = 'Next autoship on {nextAutoshipDate:MMMM d} is {nextAutoshipPV:N} PV.';
        $type->title       = 'Autoships Under 100 PV';
        $type->description = 'Future autoship profiles under the recommended 100 PV level.';
        $lists[]           = $type;

        $type              = new SmartAlertType();
        $type->type        = self::AutoshipNotConfigured;
        $type->icon        = '';
        $type->myAlert     = 'You currently do not have an autoship configured.';
        $type->teamAlert   = 'Autoship not configured.';
        $type->title       = 'Recent IBOs w/o Autoship';
        $type->description = 'IBOs without a monthly autoship who have joined in the last 28 to 90 days';
        $types[]           = $type;

        $type              = new SmartAlertType();
        $type->type        = self::NewIBO;
        $type->icon        = '';
        $type->myAlert     = 'Congratulations on joining the Genesis PURE team.';
        $type->teamAlert   = 'New IBO joined {daysSinceJoin:0} day(s) ago on {joinDate:MMMM d}.';
        $type->title       = 'New Enrollments';
        $type->description = 'New IBOs who have enrolled in the past 28 days.';
        $types[]           = $type;

        $type              = new SmartAlertType();
        $type->type        = self::RenewalExpiring;
        $type->icon        = '';
        $type->myAlert     = 'Your yearly renewal will expire on {RenewalDate:MMMM d}.';
        $type->teamAlert   = 'Yearly renewal will expire on {RenewalDate:MMMM d}.';
        $type->title       = 'Renewals About to Expire';
        $type->description = 'IBOs with renewal due in the next 14 days.';
        $types[]           = $type;

        $type              = new SmartAlertType();
        $type->type        = self::RenewalExpired;
        $type->icon        = '';
        $type->myAlert     = 'Your yearly renewal is past due';
        $type->teamAlert   = 'Yearly renewal expired on {RenewalDate:MMMM d}';
        $type->title       = 'Renewals Past Due';
        $type->description = 'IBOs with expired renewal dates in the past 7 days';
        $types[]           = $type;

        $type              = new SmartAlertType();
        $type->type        = self::AutoshipNotConfiguredNewIBO;
        $type->icon        = '';
        $type->myAlert     = 'You currently do not have an autoship configured.';
        $type->teamAlert   = 'Autoship not configured.';
        $type->title       = 'New IBOs w/o Autoship';
        $type->description = 'New IBOs without a monthly autoship who have joined in the last 28 days';
        $types[]           = $type;

        $type              = new SmartAlertType();
        $type->type        = self::PotentialNewBronzeIBO;
        $type->icon        = '';
        $type->myAlert     = 'Personally sponsor 2 people to achieve Bronze rank.';
        $type->teamAlert   = 'IBO rank after first {daysSinceJoin:0} day(s) as a new IBO.';
        $type->title       = 'Potential Bronze Ranks';
        $type->description = 'New IBOs who have yet to reach Bronze rank in their first 28 days.';
        $types[]           = $type;

        $type              = new SmartAlertType();
        $type->type        = self::AutoshipCCExpiring;
        $type->icon        = '';
        $type->myAlert     = 'Your autoship credit card expires at the end of this month.';
        $type->teamAlert   = 'Autoship credit card expires on {CCExpiryDate}.';
        $type->title       = 'Autoship Credit Card Expiring';
        $type->description = 'Autoship orders with a credit card that expires this month.';
        $types[]           = $type;

        $type              = new SmartAlertType();
        $type->type        = self::AutoshipCCExpired;
        $type->icon        = '';
        $type->myAlert     = 'Your autoship credit card has expired.';
        $type->teamAlert   = 'Autoship credit card expired on {CCExpiryDate}.';
        $type->title       = 'Autoship Credit Card Expired';
        $type->description = 'Autoship orders with a credit card that expired last month.';
        $types[]           = $type;

        $type              = new SmartAlertType();
        $type->type        = self::NewBronzeIBO;
        $type->icon        = '';
        $type->myAlert     = 'Congratulations on reaching Bronze rank!';
        $type->teamAlert   = 'IBO reached Bronze rank in first 28 days.';
        $type->title       = 'New Bronze IBOs';
        $type->description = 'New IBOs who have reached Star rank in first 28 days.';
        $types[]           = $type;

        $type              = new SmartAlertType();
        $type->type        = self::NewBronzeIBO2;
        $type->icon        = '';
        $type->myAlert     = 'Congratulations on reaching Bronze rank!';
        $type->teamAlert   = 'IBO reached Bronze rank in first 28 days.';
        $type->title       = 'New Bronze IBO2s';
        $type->description = 'New IBOs who have reached Star rank in first 2228 days.';
        $types[]           = $type;

        $type              = new SmartAlertType();
        $type->type        = self::AutoshipDiscontinuedProduct;
        $type->icon        = '';
        $type->myAlert     = '{productName} is being discontinued. Please update your autoship.';
        $type->teamAlert   = '{productName} is being discontinued.';
        $type->title       = 'Discontinued Product on Autoship';
        $type->description = 'Autoship orders that contain products set to be discontinued.';
        $types[]           = $type;

        return $types;
    }

}