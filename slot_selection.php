<?php
session_start();
if (!isset($_SESSION['visitor_type']) || !isset($_SESSION['num_members'])) {
    header("Location: booking.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "con");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$slots = ['10:00 AM', '11:30 AM', '2:00 PM', '3:30 PM'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slot Selection</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="sl.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .disabled { background-color: #F87171 !important; cursor: not-allowed !important; }
    .selected { background-color: #D8BFD8!important; color:  #D8BFD8!important; }
  </style>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
  <!-- Header -->
  <header class="bg-[#800080] text-white p-4 relative">
    <div class="flex items-center justify-between">
      <!-- Left Logo -->
      <div class="flex-shrink-0">
        <img src="logo7.png" alt="KBL Museum Logo" class="w-12 h-12">
      </div>
      <!-- Centered Title -->
      <div class="absolute left-0 right-0 text-center">
        <h1 class="text-lg font-bold">KBL Museum</h1>
      </div>
      
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-grow">
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
      <!-- Back Button -->
      <div class="mb-4">
        <a href="FRONTEND2.HTML" class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
          &larr; Back
        </a>
      </div>
      <h2 class="text-2xl font-bold text-center mb-5">Select Your Date & Slot</h2>
      <form action="payment.php" method="POST" id="slotForm">
        <!-- Date Selection -->
        <div class="mb-4">
          <label for="selected_date" class="block mb-2 font-bold">Select Date:</label>
          <input type="date" name="selected_date" id="selected_date" class="border p-2 rounded w-full" min="<?php echo date("Y-m-d"); ?>" required>
        </div>
        <!-- Slots Display -->
        <div id="slotContainer" class="grid grid-cols-2 gap-4 mt-4"></div>
        <!-- Hidden Input for Selected Slot -->
        <input type="hidden" name="selected_slot" id="selectedSlot">
        <!-- Proceed Button -->
        <button type="submit" id="bookButton" class="mt-5 w-full bg-blue-500 text-white py-2 rounded-md opacity-50 pointer-events-none">Proceed to Payment</button>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-[#800080] text-white text-center py-4">
    &copy; <?php echo date("Y"); ?> KBL Museum. All rights reserved.
  </footer>

  <script language="javascript">
    const slots = <?php echo json_encode($slots); ?>;
    const slotContainer = document.getElementById('slotContainer');
    const bookButton = document.getElementById('bookButton');
    const selectedSlotInput = document.getElementById('selectedSlot');
    let selectedSlot = null;

    document.getElementById('selected_date').addEventListener('change', function() {
      const selectedDate = this.value;
      // Fetch slot availability from the server
      fetch(`check_slots.php?selected_date=${selectedDate}`)
        .then(response => response.json())
        .then(data => {
          slotContainer.innerHTML = ''; // Clear previous slots

          slots.forEach(slot => {
            const availableSpots = data[slot] ?? 50;
            const isAvailable = availableSpots > 0;

            const button = document.createElement('button');
            button.type = 'button';
            button.className = `slot p-4 border rounded-lg ${isAvailable ? 'bg-green-200 hover:bg-green-300' : 'disabled'}`;
            button.innerHTML = `<div class="font-medium">${slot}</div>
                                <div class="text-sm text-gray-500">${availableSpots} spots available</div>`;
            button.disabled = !isAvailable;

            button.addEventListener('click', () => {
              if (selectedSlot) {
                selectedSlot.classList.remove('selected');
              }
              button.classList.add('selected');
              selectedSlot = button;
              selectedSlotInput.value = slot;
              bookButton.classList.remove('opacity-50', 'pointer-events-none');
            });

            slotContainer.appendChild(button);
          });
        });
    });
  </script>
</body>
</html>
