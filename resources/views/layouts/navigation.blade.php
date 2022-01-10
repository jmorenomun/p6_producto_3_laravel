
{{-- Student menu --}}
@if (Auth::user()->userable_type == 'student')
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Welcome back, {{ Auth::user()->name}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboard/courses">My Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboard/record">My Record</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout">Logout</a>
      </li>

    </ul>
  </div>
</nav>
  
@endif

{{-- admin menu --}}
@if (Auth::user()->userable_type == 'user_admin')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Welcome back, {{ Auth::user()->name}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/courses">Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/teachers">Teachers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/course_offerings">Course Offerings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/students">Students</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/enrollments">Enrollments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/works">Works</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/exams">Exams</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/percentages">Percentages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout">Logout</a>
      </li>

    </ul>
  </div>
</nav>
@endif