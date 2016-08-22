{% if grid is defined %}
    <div class="panel panel-default">
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
    </div>
    {{ grid.renderPagination() }}
{% endif %}