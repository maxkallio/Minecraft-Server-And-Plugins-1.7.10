import org.bukkit.Bukkit;
import org.bukkit.ChatColor;
import org.bukkit.command.Command;
import org.bukkit.command.CommandSender;
import org.bukkit.entity.Player;
import org.bukkit.plugin.java.JavaPlugin;

public class MainPlugin extends JavaPlugin {
    @Override
    public void onEnable() {
        getLogger().info("[PayDayPlugin] Enabled for 1.7.10 server!");
    }

    @Override
    public void onDisable() {
        getLogger().info("[PayDayPlugin] Plugin disabled.");
    }

    @Override
    public boolean onCommand(CommandSender sender, Command cmd, String label, String[] args) {
        if (cmd.getName().equalsIgnoreCase("rank")) {
            if (sender instanceof Player) {
                Player player = (Player) sender;
                player.sendMessage(ChatColor.GOLD + "Your current rank: " + ChatColor.AQUA + "Player");
            }
            return true;
        }
        return false;
    }
}
