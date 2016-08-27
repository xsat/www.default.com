<div class="panel panel-default">
    {% if buttons is defined %}
        <div class="panel-heading">
            {{ buttons.renderBody() }}
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
            {{ grid.renderPagination() }}
        </div>
    {% endif %}
</div>