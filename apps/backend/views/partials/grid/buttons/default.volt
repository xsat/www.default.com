{% if buttons.isButtons() %}
    {% for button in buttons.getButtons() %}
        {{ button.getValue() }}
    {% endfor %}
{% endif %}