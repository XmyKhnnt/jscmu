<style>
  .dropdown-menu {
    width: 100%;
    padding: 10px;
  }
</style>

<br><br><br><br><br>
<div class="container mt-4">
        <div>
            <form action="<?php echo site_url('articles/update/' . $articles[0]['article_id'] ); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="authorsss" id="aut-hidden" value="[]">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" value="<?php echo $articles[0]['title'] ?>" required placeholder="Title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="keywords" class="form-label">Keywords</label>
                    <input type="text" name="keywords" value="<?php echo $articles[0]['keywords'] ?>" id="keywords" required placeholder="keywords," class="form-control">
                </div>

                <div class="mb-3">
                    <label for="doi" class="form-label">DOI</label>
                    <input type="text" name="doi" id="doi" value="<?php echo $articles[0]['doi'] ?>"  placeholder="doi:" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="abstract" class="form-label">Abstract</label>
                    <textarea name="abstract" id="abstract" required class="form-control" cols="30" rows="10"><?php echo $articles[0]['abstract'] ?> </textarea>
                    <script>
                        // Replace the <textarea id="abstract"> with a CKEditor instance
                        CKEDITOR.replace('abstract');
                    </script>
                </div>

                <div class="mb-3">
                    <label for="volume" class="form-label">Volume</label>
                    <select class="form-select" name="volume" id="volume" required>
                        <option value="">Select Volume</option>
                        <?php foreach ($volumes as $volume) { ?>
                            <option value="<?php echo $volume['volumeid']; ?>" <?php echo ($volume['volumeid'] == $articles[0]['volumeid']) ? 'selected' : ''; ?>>
                                <?php echo $volume['vol_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="volume" class="form-label">Authors</label>
                    <div id="selected-authors" class="selected-items border p-2"></div>
                    <div class="dropdown w-100">
                        <button class="form-select text-start" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Authors
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    
    <?php foreach ($aut as $author) {
        $is_checked = false;
        foreach ($art_authors as $art_author) {
            if ($art_author['auid'] == $author['auid']) {
                $is_checked = true;
                break; // If the author is found, no need to continue searching
            }
        }
    ?>
        <li class="dropdown-item">
            <div class="form-check">
                <input class="form-check-input author-checkbox" <?php echo $is_checked ? 'checked' : ''; ?> type="checkbox" value="<?php echo $author['auid']; ?>" id="checkbox<?php echo $author['auid']; ?>">
                <label class="form-check-label" for="checkbox<?php echo $author['auid']; ?>">
                    <?php echo $author['name']; ?>
                </label>
            </div>
        </li>
    <?php } ?>
</ul>

                    </div>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">Upload File</label>
                    <input type="file" name="file" id="file" accept="application/pdf"  class="form-control">
                </div>

                <div class="modal-footer gap-8">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</form>

    </div>

</div>
<script>
    function updateSelectedAuthors() {
        const selectedAuthorsContainer = document.getElementById('selected-authors');
        selectedAuthorsContainer.innerHTML = ''; // Clear previous selection

        const selectedCheckboxes = document.querySelectorAll('.author-checkbox:checked');
        selectedCheckboxes.forEach(checkbox => {
            const authorName = checkbox.nextElementSibling.innerText; // Get the author name from the label
            const selectedItem = document.createElement('div');
            selectedItem.classList.add("selected-item-12")
            selectedItem.setAttribute('data-value', checkbox.value);
            selectedItem.innerText = authorName;
            selectedAuthorsContainer.appendChild(selectedItem);
        });
    }

    document.querySelectorAll('.author-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedAuthors);
    });
</script>
<script>
    function appendSelectedAuthorsToForm(event) {
        event.preventDefault(); // Prevent the default form submission
        let value_input = []
        const form = event.target;
        const selectedAuthorsContainer = document.getElementById('selected-authors');
        const existingHiddenInputs = form.querySelectorAll('input[name="authors[]"]');

        // Remove existing hidden inputs
        existingHiddenInputs.forEach(input => input.remove());

        // Append new hidden inputs for selected authors
        const selectedItems = document.querySelectorAll(".selected-item-12");

        selectedItems.forEach(item => {
           

            value_input.push(item.getAttribute('data-value'))
        });

        document.getElementById('aut-hidden').value =  value_input
        
        form.submit();
    }

    // Add event listener to form submit
    document.querySelector('form').addEventListener('submit', appendSelectedAuthorsToForm);
</script>

