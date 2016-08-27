{% if grid.isItems() %}
    <tr class="info">
        {% for item in grid.getItems() %}
            <th>
                {{ item.getTitle() }}
            </th>
        {% endfor %}
    </tr>
{% endif %}