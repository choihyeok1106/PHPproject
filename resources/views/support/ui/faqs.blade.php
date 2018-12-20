<div class="faq-content-container">
    <div class="row">
        <div class="col-md-6">
            <div class="faq-section">
                <h2 class="faq-title uppercase font-blue">{{$name}}</h2>
                <div class="panel-group accordion faq-content" id="accordion{{$id}}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="fa fa-circle"></i>
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion{{$id}}"
                                   href="#collapse_{{$children->id}}_{{$children->faqs->id}}">{{$children->faqs->question}}</a>
                            </h4>
                        </div>
                        <div id="collapse_{{$children->id}}_{{$children->faqs->id}}" class="panel-collapse collapse">
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