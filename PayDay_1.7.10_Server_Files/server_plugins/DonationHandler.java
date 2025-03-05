import org.bukkit.Bukkit;
import org.bukkit.ChatColor;
import org.bukkit.command.Command;
import org.bukkit.command.CommandSender;
import org.bukkit.entity.Player;
import org.bukkit.plugin.java.JavaPlugin;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;

public class DonationHandler extends JavaPlugin {

    private Connection connection;

    @Override
    public void onEnable() {
        connectToDatabase();
    }

    @Override
    public void onDisable() {
        closeDatabase();
    }

    private void connectToDatabase() {
        try {
            connection = DriverManager.getConnection("jdbc:mysql://localhost:3306/payday_server", "root", "password");
            getLogger().info("[PayDayPlugin] Connected to database!");
        } catch (Exception e) {
            getLogger().severe("[PayDayPlugin] Database connection failed: " + e.getMessage());
        }
    }

    private void closeDatabase() {
        try {
            if (connection != null) {
                connection.close();
            }
        } catch (Exception e) {
            getLogger().severe("[PayDayPlugin] Database close error: " + e.getMessage());
        }
    }

    @Override
    public boolean onCommand(CommandSender sender, Command cmd, String label, String[] args) {
        if (cmd.getName().equalsIgnoreCase("donate")) {
            if (sender instanceof Player) {
                Player player = (Player) sender;
                if (args.length < 2) {
                    player.sendMessage(ChatColor.RED + "Usage: /donate <amount> <rank>");
                    return true;
                }
                double amount = Double.parseDouble(args[0]);
                String rank = args[1];

                Bukkit.getScheduler().runTaskAsynchronously(this, () -> processDonation(player, amount, rank));
            }
            return true;
        }
        return false;
    }

    private void processDonation(Player player, double amount, String rank) {
        try {
            PreparedStatement stmt = connection.prepareStatement("INSERT INTO donations (user_id, amount, rank_given, payment_status) VALUES ((SELECT id FROM users WHERE username=?), ?, ?, 'Completed')");
            stmt.setString(1, player.getName());
            stmt.setDouble(2, amount);
            stmt.setString(3, rank);
            stmt.executeUpdate();
            stmt.close();

            Bukkit.dispatchCommand(Bukkit.getConsoleSender(), "pex user " + player.getName() + " group set " + rank);
            player.sendMessage(ChatColor.GREEN + "Thank you for donating! You are now " + rank);

        } catch (Exception e) {
            player.sendMessage(ChatColor.RED + "Donation processing failed.");
        }
    }
}
