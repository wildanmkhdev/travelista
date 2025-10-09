<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Booking Hotel</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .container {
      background: white;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      max-width: 500px;
      width: 100%;
    }

    .header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 30px;
      text-align: center;
    }

    .header h1 {
      font-size: 28px;
      margin-bottom: 10px;
    }

    .header p {
      font-size: 14px;
      opacity: 0.9;
    }

    .form-container {
      padding: 40px;
    }

    .form-group {
      margin-bottom: 25px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #333;
      font-size: 14px;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"] {
      width: 100%;
      padding: 12px 15px;
      border: 2px solid #e0e0e0;
      border-radius: 10px;
      font-size: 15px;
      transition: all 0.3s ease;
      font-family: inherit;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    input[type="number"]:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    input:disabled {
      background-color: #f5f5f5;
      color: #999;
      cursor: not-allowed;
    }

    .disabled-info {
      font-size: 12px;
      color: #666;
      margin-top: 5px;
      font-style: italic;
    }

    .btn-submit {
      width: 100%;
      padding: 15px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      margin-top: 10px;
    }

    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }

    .btn-submit:active {
      transform: translateY(0);
    }

    .price-display {
      background: #f8f9ff;
      padding: 15px;
      border-radius: 10px;
      margin-top: 20px;
      text-align: center;
    }

    .price-display label {
      margin-bottom: 5px;
    }

    .price-value {
      font-size: 24px;
      font-weight: bold;
      color: #667eea;
    }

    @media (max-width: 480px) {
      .form-container {
        padding: 30px 20px;
      }

      .header h1 {
        font-size: 24px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1>📋 Form Booking Hotel</h1>
      <p>Lengkapi data booking Anda</p>
    </div>

    <div class="form-container">
      <form id="bookingForm">
        <div class="form-group">
          <label for="user_id">User ID</label>
          <input type="text" id="user_id" name="user_id" value="USER12345" disabled>
          <div class="disabled-info">*Diambil dari database</div>
        </div>

        <div class="form-group">
          <label for="hotel_id">Hotel ID</label>
          <input type="text" id="hotel_id" name="hotel_id" value="HTL98765" disabled>
          <div class="disabled-info">*Diambil dari database</div>
        </div>

        <div class="form-group">
          <label for="check_in">Tanggal Check In</label>
          <input type="date" id="check_in" name="check_in" required>
        </div>

        <div class="form-group">
          <label for="check_out">Tanggal Check Out</label>
          <input type="date" id="check_out" name="check_out" required>
        </div>

        <div class="form-group">
          <label for="price_at_booking">Harga per Malam (Rp)</label>
          <input type="number" id="price_at_booking" name="price_at_booking" placeholder="Masukkan harga per malam" required min="0">
        </div>

        <div class="price-display">
          <label>Total Amount</label>
          <div class="price-value" id="total_amount">Rp 0</div>
        </div>

        <button type="submit" class="btn-submit">✓ Konfirmasi Booking</button>
      </form>
    </div>
  </div>

  <script>
    const form = document.getElementById('bookingForm');
    const checkInInput = document.getElementById('check_in');
    const checkOutInput = document.getElementById('check_out');
    const priceInput = document.getElementById('price_at_booking');
    const totalAmountDisplay = document.getElementById('total_amount');

    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    checkInInput.setAttribute('min', today);

    // Calculate total amount
    function calculateTotal() {
      const checkIn = new Date(checkInInput.value);
      const checkOut = new Date(checkOutInput.value);
      const pricePerNight = parseFloat(priceInput.value) || 0;

      if (checkInInput.value && checkOutInput.value && pricePerNight > 0) {
        const nights = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));

        if (nights > 0) {
          const total = nights * pricePerNight;
          totalAmountDisplay.textContent = 'Rp ' + total.toLocaleString('id-ID');
        } else {
          totalAmountDisplay.textContent = 'Rp 0';
        }
      } else {
        totalAmountDisplay.textContent = 'Rp 0';
      }
    }

    // Update check-out minimum date when check-in changes
    checkInInput.addEventListener('change', function() {
      const checkInDate = new Date(this.value);
      checkInDate.setDate(checkInDate.getDate() + 1);
      checkOutInput.setAttribute('min', checkInDate.toISOString().split('T')[0]);
      calculateTotal();
    });

    checkOutInput.addEventListener('change', calculateTotal);
    priceInput.addEventListener('input', calculateTotal);

    // Form submission
    form.addEventListener('submit', function(e) {
      e.preventDefault();

      const formData = {
        user_id: document.getElementById('user_id').value,
        hotel_id: document.getElementById('hotel_id').value,
        check_in: checkInInput.value,
        check_out: checkOutInput.value,
        price_at_booking: priceInput.value,
        total_amount: totalAmountDisplay.textContent.replace('Rp ', '').replace(/\./g, '')
      };

      console.log('Data Booking:', formData);
      alert('Booking berhasil!\nData telah dikirim ke server.');
    });
  </script>
</body>

</html>