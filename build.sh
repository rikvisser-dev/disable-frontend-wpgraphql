#!/bin/bash

# Build script for DFWPG plugin
echo "Building DFWPG plugin..."

# Get version from plugin file
VERSION=$(grep "Version:" FGWPG.php | sed 's/.*Version: *//' | sed 's/ *$//')
echo "Plugin Version: $VERSION"

# Create build directory
BUILD_DIR="build"
PLUGIN_DIR="$BUILD_DIR/DFWPG"

echo "Creating build directory..."
rm -rf "$BUILD_DIR"
mkdir -p "$PLUGIN_DIR"

# Copy plugin files
echo "Copying plugin files..."
cp FGWPG.php "$PLUGIN_DIR/"
cp LICENSE "$PLUGIN_DIR/"
cp readme.txt "$PLUGIN_DIR/"

# Copy directories
cp -r includes/ "$PLUGIN_DIR/includes/"
cp -r languages/ "$PLUGIN_DIR/languages/"

# Create zip file
echo "Creating zip file..."
cd "$BUILD_DIR"
zip -r "DFWPG.zip" DFWPG/

# Move zip to project root
mv "DFWPG.zip" "../DFWPG.zip"
cd ..

# Clean up build directory
rm -rf "$BUILD_DIR"

echo "Build complete!"
echo "Created: DFWPG.zip"
