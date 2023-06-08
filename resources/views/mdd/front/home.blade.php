<script>
  function handleSubmit(button) {
    var parentDiv = button.parentNode;
    var paragraph = parentDiv.querySelector('p');
    var value = paragraph.textContent;
    console.log(value);
  }
</script>

@for($i = 0; $i < 3; $i++)
    <div>
        <span>{{ $i }}</span>
        @if($i == 0)
        	<p id="ss">100</p>

        @endif

        @if($i == 1)
        	<p  id="ss">300</p>
        @endif

        @if($i == 2)
        	<p  id="ss">200</p>
        @endif
        <button class="submit-button" onclick="handleSubmit(this)">Submit</button>
    </div>
@endfor