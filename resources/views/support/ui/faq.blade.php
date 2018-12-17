<div class="faq-content-container">
    <div class="row">
        <div class="col-md-6">
            <div class="faq-section">
                <h2 class="faq-title uppercase font-blue">{{$name}}</h2>
                <div class="panel-group accordion faq-content" id="accordion1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="fa fa-circle"></i>
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="{{$children->parent_id}}"
                                   href="#collapse_1">{{$children->faqs->question}}</a>
                            </h4>
                        </div>
                        <div id="collapse_1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>{{$children->faqs->answer}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>