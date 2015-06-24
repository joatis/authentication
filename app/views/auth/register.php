{% extends 'templates/default.php' %}

{% block title %} Register {% endblock %}

{% block content %}
 <form action="{{ urlFor('register.post') }}" method="post" autocomplete="off">
   <div>
      <label for="email">Email</label>
      <input type="text" name="email" id="email">
   </div>
   <div>
      <label for="username">Username</label>
      <input type="text" name="username" id="username">
   </div>
   <div>
      <label for="password">Password</label>
      <input type="password" name="passsword" id="password">
   </div>
   <div>
      <label for="password_confirm">Password</label>
      <input type="password" name="passsword_confirm" id="password_confirm">
   </div>

   <div>
     <input type="submit" value="Register">
   </div>
 </form>
{% endblock %}
