<script>
    var numbers = document.getElementById('numbers');
    var numbersTagify = new Tagify(numbers, {});
    numbersTagify.on('add', onAddTag)

    function onAddTag(e) {
        numbersTagify.off('add', onAddTag)
    }
</script>
