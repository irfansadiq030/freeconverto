
Dropzone.options.myGreatDropzone = { // camelized version of the `id`
    paramName: "imgFile", // The name that will be used to transfer the file
    maxFilesize: 15, // MB
    // autoProcessQueue: false,
    clickable: '#custom-button',

    previewsContainer: "#dz-preview-container", // Specify the container for previews
    previewTemplate: `
        <div class="dz-preview dz-file-preview uploaded_container relative shadow-sm rounded-md mb-4 p-5">
            <div class="flex">
                <div class="dz-image uploaded_img rounded-md mr-5"><img data-dz-thumbnail /></div>
                <div class="dz-details">
                    <div class="dz-filename text-lg font-medium"><span data-dz-name></span></div>
                    <div class="dz-size" data-dz-size></div>
                </div>
            </div>
            <div class="dz-progress upload_progressbar"><span class="dz-upload upload_bar" data-dz-uploadprogress></span></div>
           

            <span class="material-symbols-outlined cancel_btn">
                cancel
            </span>
        </div>
    `,

    init: function () {
        var myDropzone = this;

        // Handle custom button click to trigger file selection
        document.getElementById("custom-button").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default form submission
            // myDropzone.hiddenFileInput.click(); // Trigger the file input dialog
        });

        // Add additional event listeners if needed
        this.on("addedfile", function (file) {
            console.log("File added: " + file.name);
        });

        this.on("success", function (file, response) {
            console.log("File uploaded successfully: " + file.name);
        });

        this.on("error", function (file, errorMessage) {
            console.log("Error uploading file: " + file.name);
        });
    },
};



