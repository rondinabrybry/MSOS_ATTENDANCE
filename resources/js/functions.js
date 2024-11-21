// app.js
document.addEventListener('DOMContentLoaded', function() {
    const openQRButton = document.getElementById('openQRButton');
    const openQRLogout = document.getElementById('openQRLogout');

    if (openQRButton) {
        openQRButton.addEventListener('click', function () {
            fetch(openQRButton.getAttribute('data-route'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': openQRButton.getAttribute('data-csrf')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.url) {
                    window.open(data.url, '_blank');
                }
            });
        });
    }

    if (openQRLogout) {
        openQRLogout.addEventListener('click', function () {
            fetch(openQRLogout.getAttribute('data-route'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': openQRLogout.getAttribute('data-csrf')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.url) {
                    window.open(data.url, '_blank');
                }
            });
        });
    }



    const fileInput = document.getElementById('fileInput');
    const errorMessage = document.getElementById('errorMessage');
    const csvTableContainer = document.getElementById('csvTableContainer');
    const csvTableHeader = document.getElementById('csvTableHeader');
    const csvTableBody = document.getElementById('csvTableBody');
    const uploadButton = document.getElementById('uploadButton');
    const progressContainer = document.getElementById('progressContainer');
    const progressBar = document.getElementById('progressBar');
    const completedModal = document.getElementById('completedModal');
    const closeModalButton = document.getElementById('closeModalButton');

    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
    
        errorMessage.classList.add('hidden');
        csvTableContainer.classList.add('hidden');
        csvTableHeader.innerHTML = '';
        csvTableBody.innerHTML = '';
    
        if (file && file.type === 'text/csv') {
            const reader = new FileReader();
            reader.onload = (e) => {
                const rows = e.target.result.split('\n').map(row => row.split(','));
    
                const headers = rows[0];
                const headerRow = document.createElement('tr');
                headerRow.classList.add('text-xs', 'text-gray-700', 'uppercase', 'bg-gray-50', 'dark:bg-gray-700', 'dark:text-gray-400');
                headers.forEach(header => {
                    const th = document.createElement('th');
                    th.textContent = header.trim();
                    th.classList.add('px-6', 'py-3');
                    headerRow.appendChild(th);
                });
                csvTableHeader.appendChild(headerRow);
    
                rows.slice(1).forEach(row => {
                    const tr = document.createElement('tr');
                    tr.classList.add('bg-white', 'border-b', 'dark:bg-gray-800', 'dark:border-gray-700', 'hover:bg-gray-50', 'dark:hover:bg-gray-600');
                    row.forEach(cell => {
                        const td = document.createElement('td');
                        td.textContent = cell.trim();
                        td.classList.add('px-6', 'py-4');
                        tr.appendChild(td);
                    });
                    csvTableBody.appendChild(tr);
                });
    
                csvTableContainer.classList.remove('hidden');
            };
            reader.readAsText(file);
        } else {
            errorMessage.classList.remove('hidden');
            fileInput.value = '';
        }
    });
    

    document.getElementById('csvForm').addEventListener('submit', function(e) {
        uploadButton.disabled = true;
        progressContainer.style.display = 'block';
        let progress = 0;
        const totalRows = csvTableBody.querySelectorAll('tr').length;
        let processedRows = 0;

        const interval = setInterval(() => {
            processedRows = Math.min(processedRows + Math.floor(Math.random() * 5) + 1, totalRows);
            progress = (processedRows / totalRows) * 100;
            progressBar.style.width = progress + '%';
            progressBar.textContent = `${processedRows} / ${totalRows}`;

            if (processedRows >= totalRows) {
                clearInterval(interval);
                setTimeout(() => {
                    progressContainer.style.display = 'none';
                    uploadButton.disabled = false;
                    completedModal.classList.remove('hidden');
                }, 5000);
            }
        }, 200);
    });
    

    closeModalButton.addEventListener('click', () => {
        completedModal.classList.add('hidden');
    });

});
