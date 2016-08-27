{% if grid.isModels() %}
    {% for model in grid.getModels() %}
        <tr>
            {% for item in grid.getItems() %}
                <td>
                    {{ item.setModel(model) }}
                    {{ item.getValue() }}
                </td>
            {% endfor %}
        </tr>
    {% endfor %}
{% else %}
    <tr align="center">
        <td colspan="{{ grid.getSize() }}">
            No Item
        </td>
    </tr>
{% endif %}