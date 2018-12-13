<!-- Widget::Summary-->
<div class="grid-item" id="widget-summary" data-widget="{{$id}}">
    <div class="grid-box widget-summary">
        <div class="grid-head">
            <div class="grid-caption widget-caption">
                BUSINESS SUMMARY
                <span class="caption-helper">monthly stats...</span>
            </div>
        </div>
        <div class="grid-actions">
            <div class="btn-group btn-group-devided" data-toggle="buttons">
                <button type="button" id="summary-curr-btn"
                        class="btn btn-circle btn-outline green btn-sm active">Current
                </button>
                <button type="button" id="summary-last-btn"
                        class="btn btn-circle btn-outline green btn-sm">Last
                </button>
            </div>
        </div>
        <div class="grid-body" data-scale="0.6" data-min="400">
            <div class="grid-wrap">
                <table id="summary-curr-tb">
                    <tr>
                        <td>
                            <div class="tile"><b>PERSONAL VOLUME</b><span>PV</span></div>
                            <div class="number" id="curr-pv-val"> 0</div>
                            <div class="desc" id="curr-pv-per"><i class="fa"></i> <i class="per">0</i>%
                            </div>
                        </td>
                        <td>
                            <div class="tile"><b>LAST 4 WEEKS PV</b><span>LAST 4</span></div>
                            <div class="number green" id="curr-last4-val"> 0</div>
                            <div class="desc" id="curr-last4-active"> Inactive</div>
                        </td>
                        <td>
                            <div class="tile"><b>CURRENT RANK</b><span>RANK</span></div>
                            <div class="number rank" id="curr-rank-name">
                                <b>Unknown</b><span>Unknown</span>
                            </div>
                            <div class="desc" id="curr-rank-short">Unknown</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="tile"><b>SPONSOR TREE VOLUME</b><span>STV</span></div>
                            <div class="number green" id="curr-stv-val">0</div>
                            <div class="desc" id="curr-stv-per"><i class="fa"></i> <i class="per">0</i> %
                            </div>
                        </td>
                        <td>
                            <div class="tile"><b>LEFT TEAM VOLUME</b><span>LTV</span></div>
                            <div class="number" id="curr-ltv-val"> 0</div>
                            <div class="desc" id="curr-ltv-per"><i class="fa"></i> <i class="per">0</i>%
                            </div>
                        </td>
                        <td>
                            <div class="tile"><b>RIGHT TEAM NOTE</b><span>RTV</span></div>
                            <div class="number" id="curr-rtv-val"> 0</div>
                            <div class="desc" id="curr-rtv-per"><i class="fa"></i> <i class="per">0</i>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="tile"><b>NEW IN LAST 7 DAYS</b><span>LAST 7</span></div>
                            <div class="number" id="curr-last7-val"> 0</div>
                            <div class="desc" id="curr-last7-per"><i class="fa"></i> <i class="per"></i>%
                            </div>
                        </td>
                        <td>
                            <div class="tile" title="PERSONALLY SPONSORED ACTIVE"> PS ACTIVE</div>
                            <div class="number" id="curr-psa-left"> 0</div>
                            <div class="desc">Left</div>
                        </td>
                        <td>
                            <div class="tile" title="PERSONALLY SPONSORED ACTIVE"> PS ACTIVE</div>
                            <div class="number" id="curr-psa-right"> 0</div>
                            <div class="desc">Right</div>
                        </td>
                    </tr>
                </table>
                <table id="summary-last-tb">
                    <tr>
                        <td>
                            <div class="tile"><b>PERSONAL VOLUME</b><span>PV</span></div>
                            <div class="number" id="last-pv-val"> 0</div>
                            <div class="desc" id="last-pv-per"><i class="fa"></i> <i class="per">0</i>%
                            </div>
                        </td>
                        <td>
                            <div class="tile"><b>LAST 4 WEEKS PV</b><span>LAST 4</span></div>
                            <div class="number green" id="last-last4-val"> 0</div>
                            <div class="desc info" id="last-last4-active"> Inactive</div>
                        </td>
                        <td>
                            <div class="tile"><b>CURRENT RANK</b><span>RANK</span></div>
                            <div class="number rank" id="last-rank-name">
                                <b>Unknown</b><span>Unknown</span>
                            </div>
                            <div class="desc" id="last-rank-short">Unknown</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="tile"><b>SPONSOR TREE VOLUME</b><span>STV</span></div>
                            <div class="number green" id="last-stv-val">0</div>
                            <div class="desc" id="last-stv-per"><i class="fa"></i> <i class="per">0</i> %
                            </div>
                        </td>
                        <td>
                            <div class="tile"><b>LEFT TEAM VOLUME</b><span>LTV</span></div>
                            <div class="number" id="last-ltv-val"> 0</div>
                            <div class="desc" id="last-ltv-per"><i class="fa"></i> <i class="per">0</i>%
                            </div>
                        </td>
                        <td>
                            <div class="tile"><b>RIGHT TEAM VOLUME</b><span>RTV</span></div>
                            <div class="number" id="last-rtv-val"> 0</div>
                            <div class="desc" id="last-rtv-per"><i class="fa"></i> <i class="per">0</i>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="tile"><b>NEW IN LAST 7 DAYS</b><span>LAST 7</span></div>
                            <div class="number" id="last-last7-val"> 0</div>
                            <div class="desc" id="last-last7-per"><i class="fa"></i> <i class="per"></i>%
                            </div>
                        </td>
                        <td>
                            <div class="tile" title="PERSONALLY SPONSORED ACTIVE"> PS ACTIVE</div>
                            <div class="number" id="last-psa-left"> 0</div>
                            <div class="desc">Left</div>
                        </td>
                        <td>
                            <div class="tile" title="PERSONALLY SPONSORED ACTIVE"> PS ACTIVE</div>
                            <div class="number" id="last-psa-right"> 0</div>
                            <div class="desc">Right</div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>