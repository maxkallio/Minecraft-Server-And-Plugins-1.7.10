
package com.payday.server;

import org.bukkit.plugin.java.JavaPlugin;

public class MainPlugin extends JavaPlugin {
    @Override
    public void onEnable() {
        getLogger().info("PayDay 1.7.10 Server Plugin Enabled!");
    }

    @Override
    public void onDisable() {
        getLogger().info("PayDay 1.7.10 Server Plugin Disabled!");
    }
}
