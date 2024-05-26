<style>
  .dropdown-menu {
    width: 100%;
    padding: 10px;
  }
</style>

<br><br><br><br><br>
<div class="container mt-4">
        <div>
            <form action="<?php echo site_url('articles'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="authorsss" id="aut-hidden" value="[]">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" required placeholder="Title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="keywords" class="form-label">Keywords</label>
                    <input type="text" name="keywords" id="keywords" required placeholder="keywords," class="form-control">
                </div>

                <div class="mb-3">
                    <label for="doi" class="form-label">DOI</label>
                    <input type="text" name="doi" id="doi" placeholder="doi:" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="abstract" class="form-label">Abstract</label>
                    <textarea name="abstract" id="abstract" required class="form-control" cols="30" rows="10"></textarea>
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
                            <option value="<?php echo $volume['volumeid']; ?>"><?php echo $volume['vol_name']; ?></option>
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
                            <?php foreach ($authors as $author) { ?>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input author-checkbox" type="checkbox" value="<?php echo $author['auid']; ?>" id="checkbox<?php echo $author['auid']; ?>">
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
                    <input type="file" name="file" id="file" accept="application/pdf" required class="form-control">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
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

