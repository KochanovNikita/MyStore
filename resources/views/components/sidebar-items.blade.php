@props([
    'link',
    'icon',
    'title'
])

<li class="nav-item">
    <a href="{{$link}}" class="nav-link">
        <i class="nav-icon {{$icon}}"></i>
        <p>
            {{$title}}
        </p>
    </a>
</li>
