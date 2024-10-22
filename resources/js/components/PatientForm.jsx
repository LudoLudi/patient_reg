import React, { useState } from "react";
import axios from "axios";

const PatientForm = () => {
    // Initial state to hold form data
    const [formData, setFormData] = useState({
        fname: "",
        lname: "",
        nid: "",
        dob: "",
        address_id: "",
    });

    // State to handle form submission status
    const [successMessage, setSuccessMessage] = useState("");
    const [errorMessage, setErrorMessage] = useState("");

    // Handle form field changes
    const handleChange = (e) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.value,
        });
    };

    // Handle form submission
    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await axios.post("/api/patient", formData);
            setSuccessMessage("Patient added successfully!");
            setErrorMessage(""); // Clear error message on success
        } catch (error) {
            setErrorMessage("Failed to add patient. Please try again.");
            setSuccessMessage(""); // Clear success message on error
        }
    };

    return (
        <div>
            <h1>Patient Registration Form</h1>
            {successMessage && (
                <p style={{ color: "green" }}>{successMessage}</p>
            )}
            {errorMessage && <p style={{ color: "red" }}>{errorMessage}</p>}
            <form onSubmit={handleSubmit}>
                <div>
                    <label>First Name:</label>
                    <input
                        type="text"
                        name="fname"
                        value={formData.fname}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div>
                    <label>Last Name:</label>
                    <input
                        type="text"
                        name="lname"
                        value={formData.lname}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div>
                    <label>National ID (NID):</label>
                    <input
                        type="text"
                        name="nid"
                        value={formData.nid}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div>
                    <label>Date of Birth:</label>
                    <input
                        type="date"
                        name="dob"
                        value={formData.dob}
                        onChange={handleChange}
                        required
                    />
                </div>

                <button type="submit">Submit</button>
            </form>
        </div>
    );
};

export default PatientForm;
