{% if breadcrumbs.isBreadcrumbs() %}
    <ol class="breadcrumb">
        {% for breadcrumb in breadcrumbs.getBreadcrumbs() %}
            <li{% if breadcrumb.isClass() %} class="{{ breadcrumb.getClass() }}"{% endif %}>
                {{ breadcrumb.getValue() }}
            </li>
        {% endfor %}
    </ol>
{% endif %}