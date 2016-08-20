
<h1>Example page header <small>Subtext for header</small></h1>
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Library</a></li>
    <li class="active">Data</li>
</ol>
{#
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
#}