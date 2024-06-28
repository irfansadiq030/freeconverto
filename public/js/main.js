Dropzone.options.myGreatDropzone = {
    // camelized version of the `id`
    paramName: "imgFile", // The name that will be used to transfer the file
    maxFilesize: 15, // MB
    // autoProcessQueue: false,
    clickable: "#custom-button",

    previewsContainer: "#dz-preview-container", // Specify the container for previews
    previewTemplate: `
            <div class="dz-preview dz-file-preview uploaded_container  relative shadow-sm rounded-md p-4">
                <div class="flex justify-center">
                    <div class="dz-image uploaded_img rounded-md "><img class="h-32" data-dz-thumbnail
                            src={{ asset('converted_images/pexels-iriser-673803.png') }} /></div>
                </div>
                <div class="dz-progress upload_progressbar">
                    <span class="dz-upload upload_bar" data-dz-uploadprogress></span>
                </div>
                <a href="#"
                    class="w-full flex justify-center items-center mt-4 bg-blue-500 rounded-md text-center p-1 text-md font-medium text-white">Download
                </a>
            </div>
    `,

    init: function () {
        var myDropzone = this;

        // Handle custom button click to trigger file selection
        document
            .getElementById("custom-button")
            .addEventListener("click", function (event) {
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
