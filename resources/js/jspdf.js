import { jsPDF } from "jspdf";

console.log('test')

document.addEventListener('DOMContentLoaded', (event) => {
    document.body.addEventListener('click', function(e) {
        if (e.target && e.target.closest('[data-action="generatePDF"]')) {
            e.preventDefault();

            fetch(e.target.closest('a').href)
                .then(response => response.json())
                .then(data => {
                    const doc = new jsPDF();

                    doc.html(data.html, {
                        callback: function (doc) {
                            doc.save(data.userName + '-profile.pdf');
                        },
                        x: 10,
                        y: 10
                    });
                });
        }
    });
});
