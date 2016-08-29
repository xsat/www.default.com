{#<ul class="nav navbar-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li>
                {{ link_to(['for': 'c-admin', 'controller': 'role_access'], 'RoleAccesses') }}
            </li>
            <li>
                {{ link_to(['for': 'c-admin', 'controller': 'role'], 'Roles') }}
            </li>
            <li>
                {{ link_to(['for': 'c-admin', 'controller': 'resource'], 'Resources') }}
            </li>
            <li>
                {{ link_to(['for': 'c-admin', 'controller': 'access'], 'Accesses') }}
            </li>
        </ul>
    </li>
</ul>#}

<ul class="nav navbar-nav">
    {% for name, items in menu.getItems() %}
        <li class="dropdown">
            <a href="javascript:void(0);"
               class="dropdown-toggle active"
               data-toggle="dropdown"
               role="button"
               aria-haspopup="true"
               aria-expanded="false">
                {{ name }}
            </a>
            <ul class="dropdown-menu">
                {% for item in items %}
                    <li{% if item.isActive() %} class="active"{% endif %}>
                        {{ link_to(item.getLink(), item.getTitle()) }}
                    </li>
                {% endfor %}
            </ul>
        </li>
    {% endfor %}
</ul>