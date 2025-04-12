#!/bin/bash

# Make sure we're in the right directory
cd "$(dirname "$0")"

# Create uploads directory if it doesn't exist
mkdir -p uploads/profile_photos

# Set permissions
chmod -R 777 uploads

echo "=============================================="
echo "Directory permissions fixed!"
echo "=============================================="
echo "If you're still having problems, run these commands as root or with sudo:"
echo "sudo chown -R daemon:daemon /opt/lampp/htdocs/gyaanuday/uploads"
echo "sudo chmod -R 777 /opt/lampp/htdocs/gyaanuday/uploads"
echo "=============================================="
echo "Current permissions:"
ls -la uploads
echo "=============================================="
