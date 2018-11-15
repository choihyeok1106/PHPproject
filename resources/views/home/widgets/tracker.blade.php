<!-- Widget::Tracker -->
<div class="grid-item" id="widget-tracker" data-widget="tracker">
    <div class="grid-box widget-tracker">
        <div class="grid-head">
            <div class="grid-caption widget-caption">
                RANK TRACKER
            </div>
        </div>
        <div class="grid-actions">
            <div class="btn-group btn-group-devided" data-toggle="buttons">
                <a href="#" class="btn btn-circle btn-outline btn-sm blue">Leadership Rank</a>
            </div>
        </div>
        <div class="grid-body" data-scale=".75" data-min="450">
            <div class="grid-wrap">
                <table>
                    <thead>
                    <tr>
                        <td>
                            <button type="button" id="track-prev" class="btn btn-outline btn-sm blue">
                                <i class="la la-angle-left"></i>
                            </button>
                        </td>
                        <td>
                            <div class="tile">RANK GOAL</div>
                            <div class="rank" id="track-name">IBO</div>
                            <div class="desc">
                                <span class="left">LTV <span id="track-ltv">0</span></span>
                                <span>|</span>
                                <span class="right">STV <span id="track-stv">0</span></span>
                            </div>
                        </td>
                        <td>
                            <button type="button" id="track-next" class="btn btn-outline btn-sm blue">
                                <i class="la la-angle-right"></i>
                            </button>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="3">
                            <div class="chart">
                                <div class="sub">LESSER TEAM VOLUME</div>
                                <div id="tracker-circle"></div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3">
                            <div class="sub">SPONSOR TREE VOLUME</div>
                            <div class="stv-bar">
                                <div>
                                    <span class="text-success text-18" id="track-stv-curr">0</span>
                                    <span class="text-muted">/ <span id="track-stv-cond">0</span></span>
                                </div>
                                <div class="progress">
                                    <div id="track-stv-bar" class="progress-bar progress-bar-success" role="progressbar"
                                         aria-valuenow="0"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width: 0">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>