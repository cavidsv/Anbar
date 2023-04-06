<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<select class="changeLang">
  <option value="az" {{session()->get('locale')=='az' ? 'selected' : ''}}>AZ</option>
  <option value="en" {{session()->get('locale')=='en' ? 'selected' : ''}}>EN</option>
</select>

<h1>{{ __('messages.title') }}</h1>



<script>
  let url = "{{route('changeLang')}}"
  $('.changeLang').change(function(){
    window.location.href = url + "?lang=" + $(this).val()
  })
</script>
