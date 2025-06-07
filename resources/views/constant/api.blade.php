<script>
    const api = {
        auth:{
            login:  async (data) => {
                const formData = new FormData();

                for (const key in data) {
                    if (data.hasOwnProperty(key)) {
                        formData.append(key, data[key]);
                    }
                }

                const response = await fetch("{{route('auth.login')}}", {
                    method: 'POST',
                    body: formData,
                });
                
                if (!response.ok) {
                    const errorData = await response.json(); // Parse error response
                    throw errorData;
                }
                return response.json();
            },
        },
        admin: {
            category: {
                save:  async (data) => {
                    const formData = new FormData();

                    for (const key in data) {
                        if (data.hasOwnProperty(key)) {
                            formData.append(key, data[key]);
                        }
                    }

                    const response = await fetch("{{route('admin.category.save')}}", {
                        method: 'POST',
                        body: formData,
                    });
                    
                    if (!response.ok) {
                        const errorData = await response.json(); // Parse error response
                        throw errorData;
                    }
                    return response.json();
                },
                list:  async (data) => {
                    const response = await fetch("{{route('admin.category.list')}}", {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(data)
                    });
                    return response.json();
                },
                delete:  async (data) => {
                    const response = await fetch("{{route('admin.category.delete')}}", {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(data)
                    });
                    return response.json();
                },
                updateStatus:  async (data) => {
                    const response = await fetch("{{route('admin.category.update.status')}}", {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(data)
                    });
                    return response.json();
                }
            },
            business: {
                list:  async (data) => {
                    const response = await fetch("{{route('admin.business.list')}}", {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(data)
                    });
                    return response.json();
                },
                delete:  async (data) => {
                    const response = await fetch("{{route('admin.business.delete')}}", {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(data)
                    });
                    return response.json();
                },
                updateStatus:  async (data) => {
                    const response = await fetch("{{route('admin.business.update.status')}}", {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(data)
                    });
                    return response.json();
                }
            }
        },

        landing: {
            business: {
                save:  async (data) => {
                    const formData = new FormData();

                    for (const key in data) {
                        if (data.hasOwnProperty(key)) {
                            formData.append(key, data[key]);
                        }
                    }

                    const response = await fetch("{{route('landing.business.save')}}", {
                        method: 'POST',
                        body: formData,
                    });

                    if (!response.ok) {
                        const errorData = await response.json(); // Parse error response
                        throw errorData;
                    }

                    return response.json();
                }
            }
        }
    }
</script>