document.addEventListener("DOMContentLoaded", function () {
    // Set the PDF file URL
    const pdfUrl = "/panduan.pdf";

    // Fetch the PDF document
    pdfjsLib.getDocument(pdfUrl).promise.then(function (pdfDoc) {
        // Get the reference to the container where the PDF will be displayed
        const container = document.querySelector(".container-fluid");

        // Loop through each page of the PDF document
        for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
            // Create a container for each page
            const pageContainer = document.createElement("div");
            pageContainer.className = "pdf-page-container";

            // Append the page container to the main container
            container.appendChild(pageContainer);

            // Fetch the page
            pdfDoc.getPage(pageNum).then(function (page) {
                // Set the scale for rendering the page
                const scale = 1.5;
                const viewport = page.getViewport({ scale });

                // Create a canvas element to render the page
                const canvas = document.createElement("canvas");
                canvas.width = viewport.width;
                canvas.height = viewport.height;
                const context = canvas.getContext("2d");

                // Render the page on the canvas
                const renderContext = {
                    canvasContext: context,
                    viewport: viewport,
                };
                page.render(renderContext).promise.then(function () {
                    // Append the canvas to the page container
                    pageContainer.appendChild(canvas);
                });
            });
        }
    });
});
