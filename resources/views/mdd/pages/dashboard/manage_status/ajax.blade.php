<script>
	$(document).ready(function () {
		$.ajax( {
			type: "GET",
			url: "/manage-status-fetch",
			dataType: "json",
			success: function (response) { 
				$(tbody).html("");

				$.each(response.data, function(key, item) {
					$('tbody').append(
							'<tr>\
								<td>'+ item.name +'</td>\
								<td>'+ item.description +'</td>\
							\</tr>');
				});
			}
		});
	});
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
  crossorigin="anonymous"></script>