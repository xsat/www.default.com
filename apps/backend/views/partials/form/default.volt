<div class="panel panel-default">
    {% if breadcrumbs is defined %}
        {{ partial('partials/grid/breadcrumbs/default') }}
    {% endif %}
    {% if flashSession.has() %}
        <div id="messages">{{ flashSession.output() }}</div>
    {% endif %}
    <div class="panel-body">
        <form class="form-horizontal" action="" method="post">
            {% for name in form.getNames() %}
                <div class="form-group">
                    {{ form.label(name, ['class': 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        {{ form.render(name) }}
                        {{ form.messages(name) }}
                    </div>
                </div>
            {% endfor %}
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {{ form.render('submit') }}
                </div>
            </div>
        </form>
    </div>
</div>