<div class="panel panel-default">
    {% if breadcrumbs is defined %}
        {{ partial('partials/grid/breadcrumbs/default') }}
    {% endif %}
    {% if buttons is defined %}
        <div class="panel-heading">
            {{ partial('partials/grid/buttons/default') }}
        </div>
    {% endif %}
    {% if flashSession.has() %}
        <div id="messages">{{ flashSession.output() }}</div>
    {% endif %}
    {% if form is defined %}
        <div class="panel-body">
            {{ partial('partials/form/filter') }}
        </div>
    {% endif %}
    {% if grid is defined %}
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    {{ partial('partials/grid/header/default') }}
                </thead>
                <tbody>
                    {{ partial('partials/grid/body/default') }}
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            {{ partial('partials/grid/pagination/default') }}
        </div>
    {% endif %}
</div>