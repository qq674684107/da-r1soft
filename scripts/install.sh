#!/bin/sh
#
# Created by Peter Bin

PLUGINPATH=/usr/local/directadmin/plugins/da-r1soft
cd ${PLUGINPATH}

# Plugin
chmod -R 755 ${PLUGINPATH}
chown -R diradmin:diradmin ${PLUGINPATH}

chmod 644 ${PLUGINPATH}/plugin.conf
chown diradmin:diradmin ${PLUGINPATH}/plugin.conf

chmod 666 ${PLUGINPATH}/admin.conf
chown diradmin:diradmin ${PLUGINPATH}/admin.conf

echo "Successfully installed R1Soft plugin to DirectAdmin.";

exit 0;