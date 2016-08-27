<form class="form-inline" action="" method="get">
    {% for name in form.getNames() %}
        <div class="form-group">
            {{ form.label(name, ['class': 'control-label']) }}
            {{ form.render(name) }}
            {{ form.messages(name) }}
        </div>
    {% endfor %}
    <div class="form-group">
        {{ form.render('submit') }}
    </div>
</form>