import React, { useEffect, useState } from 'react';
import axios from 'axios';

function App() {
  const [appointments, setAppointments] = useState([]);

  useEffect(() => {
    axios.get('http://127.0.0.1:5000/appointments')
      .then(response => {
        setAppointments(response.data);
      })
      .catch(error => {
        console.error('There was an error fetching the appointments!', error);
      });
  }, []);

  return (
    <div className="App">
      <h1>Appointments</h1>
      <ul>
        {appointments.map(appointment => (
          <li key={appointment._id}>
            {appointment.description} on {new Date(appointment.date_time).toLocaleString()}
          </li>
        ))}
      </ul>
    </div>
  );
}

export default App;
