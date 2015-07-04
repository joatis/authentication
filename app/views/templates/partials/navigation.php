{% if auth %}
  Hello, {{auth.getFullNameOrUserName}}
{% endif %}


<nav>
  <ul>
    <li><a href="{{ urlFor('home') }}">Home</a></li>
    {% if auth %}
      Logged In
    {% else %}
    <li><a href="{{ urlFor('register') }}">Register</a></li>
    <li><a href="{{ urlFor('login') }}">Login</a></li>
    {% endif %}
  </ul>
</nav>
