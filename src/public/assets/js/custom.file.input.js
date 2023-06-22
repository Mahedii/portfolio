$(document).ready(function () {

    // Event listener for file input change
    document.getElementById("file-input").addEventListener("change", handleFileInputChange);

    // Event listeners for drag and drop functionality
    document.querySelector(".file-previews").addEventListener("dragstart", handleDragStart);
    document.querySelector(".file-previews").addEventListener("dragenter", handleDragEnter);
    document.querySelector(".file-previews").addEventListener("dragend", handleDragEnd);
    document.querySelector(".file-previews").addEventListener("dragover", handleDragOver);
    document.querySelector(".file-drop-area").addEventListener("dragover", handleDragOver);
    document.querySelector(".file-drop-area").addEventListener("drop", handleDrop);

    // Event listeners for previous and next buttons
    document.querySelector(".prev-button").addEventListener("click", handlePrevButtonClick);
    document.querySelector(".next-button").addEventListener("click", handleNextButtonClick);

    // Event listeners for scroll and change events to update arrow button visibility
    document.querySelector(".file-previews").addEventListener("scroll", updateArrowButtonVisibility);
    document.getElementById("file-input").addEventListener("change", updateArrowButtonVisibility);

    // Variables to store the state and data
    let draggingElement = null;
    let initialIndex = 0;
    let currentIndex = 0;
    let selectedFiles = [];

    // Timeout variable for scroll event
    let scrollTimeout;
    const filePreviews = document.querySelector(".file-previews");
    filePreviews.addEventListener("scroll", () => {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(updateArrowButtonVisibility, 250);
    });

    /**
     * Handle file input change events.
     */
    function handleFileInputChange(event) {
        const files = event.target.files;
        addFilesToArray(files);
        previewFiles(selectedFiles);
        setMultipleFileValue(selectedFiles);
    }

    /**
     * Handle file drop events.
     */
    function handleDrop(event) {
        event.preventDefault();
        const files = event.dataTransfer.files;
        addFilesToArray(files);

        // Check if the dropped file is already in the selectedFiles array
        const droppedFileIndex = selectedFiles.findIndex(file => file.name === files[0].name);
        if (droppedFileIndex === -1) {
            previewFiles(selectedFiles);
        }

        setMultipleFileValue(selectedFiles);
    }

    /**
     * Add files to the selectedFiles array.
     */
    function addFilesToArray(files) {
        for (let i = 0; i < files.length; i++) {
            if (!selectedFiles.includes(files[i])) {
                selectedFiles.push(files[i]);
            }
        }
    }

    /**
     * Remove selected files from the selectedFiles array.
     */
    function removeFileFromArray(index) {
        selectedFiles.splice(index, 1);
    }

    /**
     * Set the files from the selectedFiles array to the file input.
     */
    function setMultipleFileValue(files) {
        const fileInput = document.getElementById("file-input");
        const dataTransfer = new DataTransfer();

        for (let i = 0; i < files.length; i++) {
            dataTransfer.items.add(files[i]);
        }

        fileInput.files = dataTransfer.files;
    }

    /**
     * Preview the selected files.
     */
    function previewFiles(files) {
        const filePreviews = document.querySelector(".file-previews");
        filePreviews.innerHTML = "";

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            // Event listener for when the FileReader has loaded the file
            reader.onload = (e) => {
                const filePreview = createFilePreview(file, e.target.result, i);
                filePreview.addEventListener("dragstart", handleDragStart);
                filePreviews.appendChild(filePreview);
                updateArrowButtonVisibility();
            };
            reader.readAsDataURL(file); // Read the file as data URL
        }
    }

    /**
     * Create a file preview element.
     */
    function createFilePreview(file, imageURL, index) {
        const filePreviews = document.createElement("div");
        filePreviews.className = "file-preview";
        filePreviews.draggable = true;

        const img = document.createElement("img");
        img.src = imageURL;

        const name = document.createElement("div");
        name.className = "name";
        name.textContent = file.name;

        const size = document.createElement("div");
        size.className = "size";
        size.textContent = `${(file.size / 1024).toFixed(2)} KB`;
        // size.textContent = formatFileSize(file.size);

        const cancel = document.createElement("div");
        cancel.className = "cancel";
        cancel.textContent = "Cancel";

        img.addEventListener("click", () => {
            showImagePreview(imageURL);
        });

        cancel.addEventListener("click", () => {
            filePreviews.remove();
            removeFileFromArray(index);
            setMultipleFileValue(selectedFiles);
            updateArrowButtonVisibility();
        });

        filePreviews.appendChild(img);
        filePreviews.appendChild(name);
        filePreviews.appendChild(size);
        filePreviews.appendChild(cancel);

        return filePreviews;
    }

    /**
     * Format the input file size.
     */
    function formatFileSize(size) {
        if (size === 0) {
            return "0 Bytes";
        }

        const k = 1024;
        const sizes = ["Bytes", "KB", "MB", "GB", "TB"];
        const i = Math.floor(Math.log(size) / Math.log(k));

        return parseFloat((size / Math.pow(k, i)).toFixed(2)) + " " + sizes[i];
    }

    /**
     * Update arrow button visibility according to the preview file width.
     */
    function updateArrowButtonVisibility() {
        const fileInput = document.getElementById("file-input");
        const filePreviews = document.querySelector(".file-previews");
        const prevButton = document.querySelector(".prev-button");
        const nextButton = document.querySelector(".next-button");

        if (fileInput.files.length > 0 && filePreviews.scrollWidth > filePreviews.offsetWidth) {
            prevButton.style.opacity = "1";
            nextButton.style.opacity = "1";
        } else {
            prevButton.style.opacity = "0";
            nextButton.style.opacity = "0";
        }
    }

    /**
     * Handle previous button click action.
     */
    function handlePrevButtonClick(event) {
        event.preventDefault();
        const filePreviews = document.querySelector(".file-previews");
        const slideWidth = (1 / 3) * filePreviews.offsetWidth;
        filePreviews.scrollBy({
            left: -slideWidth,
            behavior: "smooth"
        });
    }

    /**
     * Handle next button click action.
     */
    function handleNextButtonClick(event) {
        event.preventDefault();
        const filePreviews = document.querySelector(".file-previews");
        const slideWidth = (1 / 3) * filePreviews.offsetWidth;
        filePreviews.scrollBy({
            left: slideWidth,
            behavior: "smooth"
        });
    }

    /**
     * Handle drag start events.
     */
    function handleDragStart(event) {
        draggingElement = event.target.closest(".file-preview");
        draggingElement.classList.add("dragging");

        initialIndex = Array.from(draggingElement.parentNode.children).indexOf(draggingElement);
        currentIndex = initialIndex;

        const clone = draggingElement.cloneNode(true);
        clone.style.opacity = "0.5"; // Adjust the opacity of the dragging clone as desired

        event.dataTransfer.setDragImage(clone, 0, 0);

        // Store the dragged file's index in a data attribute
        event.dataTransfer.setData("text/plain", initialIndex.toString());

        // Add scroll behavior to the file previews container while dragging
        document.querySelector(".file-previews").style.scrollBehavior = "auto";
    }

    /**
     * Handle drag over events.
     */
    function handleDragOver(event) {
        event.preventDefault();
    }

    /**
     * Handle drag enter events.
     */
    function handleDragEnter(event) {
        event.preventDefault();
        const targetElement = event.target.closest(".file-preview");

        if (targetElement && targetElement !== draggingElement) {
            const targetIndex = Array.from(targetElement.parentNode.children).indexOf(targetElement);

            if (currentIndex < targetIndex) {
                targetElement.parentNode.insertBefore(draggingElement, targetElement.nextSibling);
            } else {
                targetElement.parentNode.insertBefore(draggingElement, targetElement);
            }

            currentIndex = targetIndex;
        }
    }

    /**
     * Handle drag end events.
     */
    function handleDragEnd() {
        if (draggingElement) {
            draggingElement.classList.remove("dragging");
            draggingElement = null;

            const filePreviews = document.querySelector(".file-previews");
            const updatedFiles = Array.from(filePreviews.children).map((child) => {
                const index = Array.from(child.parentNode.children).indexOf(child);
                return selectedFiles[index];
            });

            selectedFiles = updatedFiles;
            setMultipleFileValue(selectedFiles);
        }
    }

    /**
     * Show the preview image.
     */
    function showImagePreview(imageUrl) {
        const previewModal = document.createElement("div");
        previewModal.className = "preview-modal";

        const previewImage = document.createElement("img");
        previewImage.src = imageUrl;

        previewModal.appendChild(previewImage);
        document.body.appendChild(previewModal);

        previewModal.addEventListener("click", () => {
            previewModal.remove();
        });
    }

});
