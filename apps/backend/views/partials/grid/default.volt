<div class="panel panel-default">
    {% if buttons is defined %}
        <div class="panel-heading">
            {{ buttons.renderBody() }}
        </div>
    {% endif %}
    {% if flashSession.has() %}
        <div id="messages">{{ flashSession.output() }}</div>
    {% endif %}
    {% if grid is defined %}
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    {{ grid.renderHeader() }}
                </thead>
                <tbody>
                    {{ grid.renderBody() }}
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            {{ grid.renderPagination() }}
        </div>
    {% endif %}
</div>