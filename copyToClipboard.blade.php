<script type="text/javascript">
    function CopyToClipboard(containerid) {
        $('#'+containerid).removeAttr('disabled');  
        $('#'+containerid).select();
        document.execCommand("copy");
        $('#'+containerid).attr('disabled','disabled');
        toastr.info("Coppied")
    }
</script>


<input class="form-control copy-input" id="copy{{ $post->id }}" type="text" value="{{ route('post.single.page', $post->token) }}" readonly disabled>
<!-- The button used to copy the text -->
<button class="copy-button" onclick="CopyToClipboard('copy{{ $post->id }}')">
    <img width="18px" src="{{ asset('img/clippy.svg') }}" alt="">
</button>