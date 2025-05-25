        // Set min date for the date input
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date').setAttribute('min', today);
        
        document.getElementById('appointmentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const doctor = document.getElementById('doctor').value; // Get selected doctor
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;
        
            const selectedDate = new Date(date);
            
            // Doctor selection validation
            if (doctor === "") {
                alert("Please select a doctor.");
                return;
            }
        
            const messageDiv = document.getElementById('message');
            messageDiv.innerHTML = `Appointment booked successfully with ${doctor} for ${name} on ${date} at ${time}.`;
            messageDiv.style.color = 'green';
        
            // Reset the form
            this.reset();
        });
        