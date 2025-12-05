/**
 * Guestbook API Client
 * Requires jQuery
 */

const GuestbookAPI = {
    // Configuration
    config: {
        baseURL: 'http://localhost:8000/api',
        apiKey: 'your-secret-api-key-here'
    },

    /**
     * Set API Key
     */
    setApiKey: function(apiKey) {
        this.config.apiKey = apiKey;
    },

    /**
     * Set Base URL
     */
    setBaseURL: function(baseURL) {
        this.config.baseURL = baseURL;
    },

    /**
     * Get all guestbooks
     */
    getAll: function(callback) {
        $.ajax({
            url: this.config.baseURL + '/guestbooks',
            method: 'GET',
            headers: {
                'X-API-KEY': this.config.apiKey
            },
            success: function(response) {
                console.log('Get All Success:', response);
                if (callback) callback(null, response);
            },
            error: function(xhr, status, error) {
                console.error('Get All Error:', xhr.responseJSON || error);
                if (callback) callback(xhr.responseJSON || error, null);
            }
        });
    },

    /**
     * Get guestbook by ID
     */
    getById: function(id, callback) {
        $.ajax({
            url: this.config.baseURL + '/guestbooks/' + id,
            method: 'GET',
            headers: {
                'X-API-KEY': this.config.apiKey
            },
            success: function(response) {
                console.log('Get By ID Success:', response);
                if (callback) callback(null, response);
            },
            error: function(xhr, status, error) {
                console.error('Get By ID Error:', xhr.responseJSON || error);
                if (callback) callback(xhr.responseJSON || error, null);
            }
        });
    },

    /**
     * Create new guestbook entry
     */
    create: function(data, callback) {
        $.ajax({
            url: this.config.baseURL + '/guestbooks',
            method: 'POST',
            headers: {
                'X-API-KEY': this.config.apiKey,
                'Content-Type': 'application/json'
            },
            data: JSON.stringify(data),
            success: function(response) {
                console.log('Create Success:', response);
                if (callback) callback(null, response);
            },
            error: function(xhr, status, error) {
                console.error('Create Error:', xhr.responseJSON || error);
                if (callback) callback(xhr.responseJSON || error, null);
            }
        });
    },

    /**
     * Update guestbook entry
     */
    update: function(id, data, callback) {
        $.ajax({
            url: this.config.baseURL + '/guestbooks/' + id,
            method: 'PUT',
            headers: {
                'X-API-KEY': this.config.apiKey,
                'Content-Type': 'application/json'
            },
            data: JSON.stringify(data),
            success: function(response) {
                console.log('Update Success:', response);
                if (callback) callback(null, response);
            },
            error: function(xhr, status, error) {
                console.error('Update Error:', xhr.responseJSON || error);
                if (callback) callback(xhr.responseJSON || error, null);
            }
        });
    },

    /**
     * Delete guestbook entry
     */
    delete: function(id, callback) {
        $.ajax({
            url: this.config.baseURL + '/guestbooks/' + id,
            method: 'DELETE',
            headers: {
                'X-API-KEY': this.config.apiKey
            },
            success: function(response) {
                console.log('Delete Success:', response);
                if (callback) callback(null, response);
            },
            error: function(xhr, status, error) {
                console.error('Delete Error:', xhr.responseJSON || error);
                if (callback) callback(xhr.responseJSON || error, null);
            }
        });
    }
};

// ========================================
// USAGE EXAMPLES
// ========================================

$(document).ready(function() {

    // Set API Key (jika berbeda dari default)
    // GuestbookAPI.setApiKey('your-api-key-here');

    // Example 1: Get all guestbooks
    function getAllGuestbooks() {
        GuestbookAPI.getAll(function(error, response) {
            if (error) {
                alert('Error: ' + (error.message || 'Failed to fetch guestbooks'));
            } else {
                console.log('All Guestbooks:', response.data);
                // Display data in your UI
            }
        });
    }

    // Example 2: Get guestbook by ID
    function getGuestbookById(id) {
        GuestbookAPI.getById(id, function(error, response) {
            if (error) {
                alert('Error: ' + (error.message || 'Guestbook not found'));
            } else {
                console.log('Guestbook Detail:', response.data);
                // Display data in your UI
            }
        });
    }

    // Example 3: Create new guestbook
    function createGuestbook() {
        var newData = {
            name: 'John Doe',
            email: 'john@example.com',
            phone: '081234567890',
            organization: 'ABC Company',
            purpose: 'Business Meeting',
            message: 'Thank you for the meeting',
            visit_date: '2025-12-05'
        };

        GuestbookAPI.create(newData, function(error, response) {
            if (error) {
                alert('Error: ' + (error.message || 'Failed to create guestbook'));
                if (error.errors) {
                    console.log('Validation Errors:', error.errors);
                }
            } else {
                alert('Success: Guestbook created!');
                console.log('Created Guestbook:', response.data);
                // Refresh list or redirect
            }
        });
    }

    // Example 4: Update guestbook
    function updateGuestbook(id) {
        var updateData = {
            name: 'John Doe Updated',
            email: 'john.updated@example.com'
        };

        GuestbookAPI.update(id, updateData, function(error, response) {
            if (error) {
                alert('Error: ' + (error.message || 'Failed to update guestbook'));
            } else {
                alert('Success: Guestbook updated!');
                console.log('Updated Guestbook:', response.data);
                // Refresh list
            }
        });
    }

    // Example 5: Delete guestbook
    function deleteGuestbook(id) {
        if (confirm('Are you sure you want to delete this guestbook entry?')) {
            GuestbookAPI.delete(id, function(error, response) {
                if (error) {
                    alert('Error: ' + (error.message || 'Failed to delete guestbook'));
                } else {
                    alert('Success: Guestbook deleted!');
                    // Refresh list
                }
            });
        }
    }

    // ========================================
    // EVENT HANDLERS - Connect to your UI
    // ========================================

    // Button to load all guestbooks
    $('#btn-load-all').on('click', function() {
        getAllGuestbooks();
    });

    // Button to load specific guestbook
    $('#btn-load-detail').on('click', function() {
        var id = $('#input-guestbook-id').val();
        if (id) {
            getGuestbookById(id);
        } else {
            alert('Please enter a guestbook ID');
        }
    });

    // Form submit to create guestbook
    $('#form-create').on('submit', function(e) {
        e.preventDefault();

        var formData = {
            name: $('#input-name').val(),
            email: $('#input-email').val(),
            phone: $('#input-phone').val(),
            organization: $('#input-organization').val(),
            purpose: $('#input-purpose').val(),
            message: $('#input-message').val(),
            visit_date: $('#input-visit-date').val()
        };

        GuestbookAPI.create(formData, function(error, response) {
            if (error) {
                alert('Error: ' + (error.message || 'Failed to create'));
                if (error.errors) {
                    // Display validation errors
                    $.each(error.errors, function(field, messages) {
                        console.log(field + ':', messages.join(', '));
                    });
                }
            } else {
                alert('Guestbook created successfully!');
                $('#form-create')[0].reset();
                getAllGuestbooks(); // Refresh list
            }
        });
    });

    // Form submit to update guestbook
    $('#form-update').on('submit', function(e) {
        e.preventDefault();

        var id = $('#update-id').val();
        var formData = {
            name: $('#update-name').val(),
            email: $('#update-email').val(),
            phone: $('#update-phone').val(),
            organization: $('#update-organization').val(),
            purpose: $('#update-purpose').val(),
            message: $('#update-message').val(),
            visit_date: $('#update-visit-date').val()
        };

        GuestbookAPI.update(id, formData, function(error, response) {
            if (error) {
                alert('Error: ' + (error.message || 'Failed to update'));
            } else {
                alert('Guestbook updated successfully!');
                $('#form-update')[0].reset();
                getAllGuestbooks(); // Refresh list
            }
        });
    });

    // Delete button click
    $(document).on('click', '.btn-delete', function() {
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this entry?')) {
            GuestbookAPI.delete(id, function(error, response) {
                if (error) {
                    alert('Error: ' + (error.message || 'Failed to delete'));
                } else {
                    alert('Guestbook deleted successfully!');
                    getAllGuestbooks(); // Refresh list
                }
            });
        }
    });

    // Auto-load guestbooks on page load
    // getAllGuestbooks();
});
