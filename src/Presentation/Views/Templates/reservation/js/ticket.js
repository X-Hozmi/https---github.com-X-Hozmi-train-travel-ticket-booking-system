document.addEventListener('DOMContentLoaded', () => {
    const userData = JSON.parse(localStorage.getItem('user'));
    const trainData = JSON.parse(localStorage.getItem('selectedTrain'));
    const cancelButton = document.querySelector('.cancel-button');
    cancelButton.addEventListener('click', () => {
        localStorage.removeItem('selectedTrain');
        window.location.href = '/dashboard';
    });

    if (userData) {
        document.getElementById('nama_pemesan').value = userData.name;
        document.getElementById('nomor_identitas').value = userData.id_number;
        document.getElementById('nomor_hp').value = userData.phone_number || '';
        document.getElementById('email').value = userData.email;
        document.getElementById('alamat').value = userData.address || '';
    }

    if (trainData) {
        // Calculate total price
        const adultPrice = parseFloat(trainData.price);
        const infantPrice = (trainData.infants > 0) ? adultPrice * 0.5 : 0;
        const totalAdultPrice = adultPrice * parseInt(trainData.adults);
        const totalInfantPrice = (trainData.infants > 0) ? infantPrice * parseInt(trainData.infants) : 0;
        const totalPrice = totalAdultPrice + totalInfantPrice;

        document.querySelector('.pricetag-title .tag').textContent = `Total Rp${Math.round(totalPrice).toLocaleString('id-ID', { style: 'decimal', minimumFractionDigits: 0 })},-`;
        document.querySelector('.train-name').textContent = trainData.trainName;
        document.querySelector('.train-type').textContent = trainData.trainClass;

        // Update total passenger text
        const passengerText = trainData.infants > 0 ?
            `${trainData.adults} DEWASA, ${trainData.infants} BAYI` :
            `${trainData.adults} DEWASA`;
        document.querySelector('.total-passanger').textContent = passengerText;

        // Update train destination details
        const trainDestinationCells = document.querySelectorAll('.train-destination .train-table td.left span, .train-destination .train-table td.right span');
        trainDestinationCells[0].textContent = trainData.source;
        trainDestinationCells[1].textContent = trainData.arrivalTime;
        trainDestinationCells[2].textContent = new Date(trainData.departureDate).toLocaleDateString('id-ID', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });

        trainDestinationCells[3].textContent = trainData.destination;
        trainDestinationCells[4].textContent = trainData.departureTime;
        trainDestinationCells[5].textContent = new Date(trainData.departureDate).toLocaleDateString('id-ID', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });
    }
});