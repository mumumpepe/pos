@props(['name'])

@php
  $defaults = [
      'type' => 'text',
      'id' => $name,
      'name' => $name,
      'class' => 'border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'
]

 @endphp


<input {{$attributes($defaults)}} />

