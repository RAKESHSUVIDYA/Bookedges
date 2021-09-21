@foreach($items as $menu_item)
    
                  <li class="">
                     <a href="{{ $menu_item->link() }}">
                     <span class="title">{{ $menu_item->title }}</span>
                     </a>
                  </li>
                  @endforeach