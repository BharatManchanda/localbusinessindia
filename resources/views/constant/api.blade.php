<script>
    const api = {
        admin: {
            category: {
                save:  async (data) => {
                    const response = await fetch("{{route('admin.category.save')}}", {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(data)
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
            }
        },
    }
</script>