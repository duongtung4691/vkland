<!-- Message -->
@if (Session::has('flash_message'))
    <div class="alert alert-{{ Session::has('flash_message_type') }}{{ Session::has('flash_message_important') ? ' alert-important' : '' }}">
        @if (Session::has('flash_message_important'))
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @endif
        {{ session('flash_message') }}
    </div>
@endif