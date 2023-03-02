</div>

<script id="rendered-js">
    $('.friend-drawer--onhover').on('click', function() {

        $('.chat-bubble').hide('slow').show('slow');

    });
</script>

<script id="rendered-js">
    $(document).ready(function() {
        $('#test').DataTable();
        $('.select2').select2();

        tinymce.init({
            selector: '.textarea',
            plugins: 'anchor autolink charmap codesample emoticons link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            setup: function (editor) {
			editor.on('change', function () {
				tinymce.triggerSave();
			});
		}
        });
    });
    //# sourceURL=pen.js
</script>