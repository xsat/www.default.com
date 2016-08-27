{% if grid.isPages() %}
    <nav>
        <ul class="pagination pagination-sm">
            {% for page in grid.getPages() %}
                <li{% if page.isClass() %} class="{{ page.getClass() }}"{% endif %}>
                    <a href="{{ page.getLink() }}">
                        {{ page.getTitle() }}
                    </a>
                </li>
            {% endfor %}
        </ul>
    </nav>
{% endif %}